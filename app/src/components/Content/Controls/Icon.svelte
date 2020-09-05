<script>
    export let value;
    export let options;

    import Box from './Icon/Box.svelte'
    import ClickOutside from 'svelte-click-outside'

    let show = false;

    let toggle = () => {
        show = !show;
    }
</script>

<style>
    button {
        width: 36px;
        line-height: 35px;
        background-color: #ffffffe6;
        text-align: center;
        font-size: 14px;
        cursor: pointer;
        color: var(--cf-primary-text);
        border-radius: var(--cf-border-radius);
        box-shadow: var(--cf-box-shadow);
        border: none;
        outline: none;
        float: left;
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
        <Box bind:value />
    {/if}
</ClickOutside>