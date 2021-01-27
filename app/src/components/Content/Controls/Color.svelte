<script>
    export let value

    import { fade } from 'svelte/transition'

    import ChromePicker from 'svelte-color/Chrome'

    import ClickOutside from 'svelte-click-outside'

    let show = false
    let style

    let change = (event) => {
        let { r, g, b, a } = event.detail

        value = `rgba(${r}, ${g}, ${b}, ${a})`
    }


    $: if (['rgba(255, 255, 255, 1)', '#fff', '#ffffff'].includes(value)) {
        style = `background-color: ${value}`
    } else {
        style = `background-color: ${value}; border-color: transparent;`
    }
</script>

<style lang="scss">
    button {
        height: 38px;
        background-color: #ffffff;
        text-align: center;
        font-size: 16px;
        cursor: pointer;
        color: var(--pco-primary-text);
        border-radius: var(--pco-border-radius);
        box-shadow: var(--pco-box-shadow);
        border: var(--pco-control-border);
        outline: none;
        float: left;
        box-sizing: border-box;
        padding: 0px 10px;
        display: flex;
        align-items: center;
        
        span {
            width: 14px;
            height: 14px;
            border-radius: 3px;
            display: inline-block;
            border: 1px solid #f4f4f4;
        }

        i {
            margin-left: 8px;
            font-size: 12px;
        }
    }

    div {
        position: absolute;
        margin-left: 75px;
        margin-bottom: 40px;
        z-index: 9999;
        
        :global(.color-picker) {
            border-radius: 3px;
            overflow: hidden;
        }
    }
</style>

<ClickOutside
    on:clickoutside={() => {
        show = false
    }}
>
    <button
        on:click={() => {
            show = !show
        }}
    >
        <span {style} />
        <i class="ri-arrow-down-s-fill" />
    </button>

    {#if show}
        <div transition:fade={{ duration: 100 }}>
            <ChromePicker on:input={change} startColor={value} />
        </div>
    {/if}
</ClickOutside>