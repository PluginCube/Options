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

<style>
    button {
        width: 42px;
        height: 40px;
        line-height: 39px;
        background-color: #ffffff;
        text-align: center;
        font-size: 14px;
        cursor: pointer;
        color: var(--co-primary-text);
        border-radius: var(--co-border-radius);
        box-shadow: var(--co-box-shadow);
        border: var(--co-control-border);
        outline: none;
        float: left;
        box-sizing: border-box;
        padding: 0;
    }
</style>

<ClickOutside
    on:clickoutside={() => {
        show = false
    }}
>
    <button on:click={toggle}>
        {#if value}<i class={value} />{:else}<i class="ri-add-fill" />{/if}
    </button>

    {#if show}
        <Box {value} on:update={update} />
    {/if}
</ClickOutside>