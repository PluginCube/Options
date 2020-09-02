<script>
	export let value;
    
    import { fade } from 'svelte/transition'
    import ChromePicker from 'svelte-color/Chrome.svelte'
    import ClickOutside from 'svelte-click-outside'

    let show = false;

    let change = (event) => {
        let {r, g, b, a} = event.detail;

        value = `rgba(${r}, ${g}, ${b}, ${a})`
    }

    $: style = `background-color: ${value}`
</script>

<style>
    span {
        float: left;
        width: 28px;
        height: 28px;
        border-radius: 3px;
        cursor: pointer;
    }

    div {
        position: absolute;
        margin-left: 50px;
        border-radius: 5px;
        overflow: hidden;
        margin-bottom: 40px;
        box-shadow: 0px 0px 20px rgba(0,0,0, 0.1);
    }
</style>

<ClickOutside on:clickoutside={() => {show = false}}>
    <span {style} on:click={() => {show = !show}}></span>

    {#if show}
        <div transition:fade={{duration: 100}}>
            <ChromePicker on:input={change} startColor={value}/>
        </div>    
    {/if}
</ClickOutside>
