<script>
    export let value

    import ClickOutside from 'svelte-click-outside'

    import Box from './Icon/Box'

    let show = false

    let toggle = () => {
        show = !show
    }

    let update = (e) => {
        value = e.detail
        toggle()
    }
</script>

<style lang="scss">
    button {
        height: 38px;
        line-height: 37px;
        background-color: var(--pco-control-bg);
        text-align: center;
        font-size: 16px;
        cursor: pointer;
        color: var(--pco-primary-text);
        border-radius: 30px;
        box-shadow: var(--pco-box-shadow);
        border: var(--pco-control-border);
        outline: none;
        float: left;
        box-sizing: border-box;
        padding: 0px 10px;
        
        span {
            margin-left: 5px;
            font-size: 12px;
            color: var(--pco-primary-text);
            opacity: .3;
            float: right;
        }
    }
</style>

<ClickOutside
    on:clickoutside={() => {
        show = false
    }}
>
    <button on:click={toggle}>
        {#if value}<i class={value} />{:else}<i class="ri-add-fill" />{/if}
        
        <span class="ri-arrow-down-s-fill"></span>
    </button>

    {#if show}
        <Box {value} on:update={update} />
    {/if}
</ClickOutside>