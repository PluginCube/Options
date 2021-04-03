<script>
    export let value

    import { fade } from 'svelte/transition'

    import ChromePicker from 'svelte-color/Chrome'

    import ClickOutside from 'svelte-click-outside'

    let show = false
    let color = value
    let style

    $: if (typeof color == 'object') {
        value = `rgba(${color.r}, ${color.g}, ${color.b}, ${color.a})`
    }

    $: if (['rgba(255, 255, 255, 1)', '#fff', '#ffffff'].includes(value)) {
        style = `background-color: ${value}; box-shadow: inset 0px 0px 0px 1px #0000001a;`
    } else {
        style = `background-color: ${value}`
    }
</script>

<style lang="scss">
    button {
        height: 36px;
        background-color: var(--pco-control-bg);
        text-align: center;
        font-size: 16px;
        cursor: pointer;
        border-radius: 30px;
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
            border-radius: 20px;
            display: inline-block;
        }

        i {
            margin-left: 6px;
            font-size: 12px;
            color: var(--pco-primary-text);
            opacity: .3;
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
            <ChromePicker bind:color startColor={value}/>
        </div>
    {/if}
</ClickOutside>