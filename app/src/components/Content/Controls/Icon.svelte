<script>
    export let value;

    import Box from './Icon/Box.svelte'
    import ClickOutside from 'svelte-click-outside'

    let show = false;

    let toggle = () => {
        show = !show;
    }

    let update = (e) => {
        value = e.detail;
        toggle();
    }
</script>

<style>
    button {
        width: 38px;
        height: 38px;
        line-height: 36px;
        background-color: #ffffff;
        text-align: center;
        font-size: 14px;
        cursor: pointer;
        color: var(--cf-primary-text);
        border-radius: var(--cf-border-radius);
        box-shadow: var(--cf-box-shadow);
        border: var(--cf-control-border);
        outline: none;
        float: left;
        box-sizing: border-box;
    }
</style>


<ClickOutside on:clickoutside={() => {show = false}}>

    <button on:click={toggle}>
        {#if value}
            <i class={value}></i>
        {:else}
            <i class="ri-add-fill"></i>
        {/if}
    </button>
    

    {#if show}
        <Box {value} on:update={update} />
    {/if}
</ClickOutside>