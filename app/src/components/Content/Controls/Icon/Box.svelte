<script>
    import {
        onMount,
        onDestroy,
        afterUpdate,
        createEventDispatcher,
    } from 'svelte'

    import { fade } from 'svelte/transition'

    import categories from './tags.json'

    import Header from './Header'

    import PerfectScrollbar from 'perfect-scrollbar'

    import 'perfect-scrollbar/css/perfect-scrollbar.css'

    let dispatch = createEventDispatcher()

    let box
    let ps

    let style = 'fill'
    let category = 'Weather'

    $: icons = Object.keys(categories[category]).map((i) => {
        let icon

        if (category == 'Editor') {
            icon = `ri-${i}`
        } else {
            icon = `ri-${i}-${style}`
        }

        return icon
    })

    onMount(() => {
        ps = new PerfectScrollbar(box)
    })

    afterUpdate(() => {
        ps.update()
    })

    onDestroy(() => {
        ps.destroy()
        ps = null
    })
</script>

<style lang="scss">
    div {
        position: absolute;
        margin-left: 65px;
        margin-bottom: 40px;
        box-shadow: var(--pco-box-shadow-lg);
        border-radius: var(--pco-border-radius);
        background: white;
        width: 220px;
        max-height: 280px;
        overflow: hidden;
        z-index: 9999;

        ul {
            border-radius: var(--pco-border-radius);
            background: white;
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            max-height: 210px;
            position: relative;

            li {
                float: left;
                margin: 5px;
                width: calc(25% - 10px);
                text-align: center;
                line-height: 38px;
                font-size: 14px;
                color: var(--pco-primary-text);
                border-radius: var(--pco-border-radius);
                transition: all 0.1s;
                cursor: pointer;
                padding-top: 1px;
                background-color: #eeeeee;
                
                &:hover {
                    background-color: rgb(226, 226, 226);
                }
            }
        }
    }
</style>

<div transition:fade={{ duration: 50 }}>
    <Header
        bind:style
        bind:category
        categories={Object.keys(categories)}
    />

    <ul bind:this={box}>
        {#each icons as icon}
            <li on:click={() => dispatch('update', icon)}>
                <i class={icon} />
            </li>
        {/each}
    </ul>
</div>