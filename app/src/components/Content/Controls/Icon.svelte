<script>
    export let value;
    export let options;

    import { translation } from 'store'
    import { categories } from '@iconify/json/json/ri.json'
    import { onMount } from 'svelte';
    import ClickOutside from 'svelte-click-outside'

    let box;
    let ps;
    let icons = [];
    let show = false;

    Object.keys(categories).forEach(cat => {
        categories[cat].forEach(icon => {
            icons.push('ri-' + icon);
        });
    });

    $: filtered = icons.filter(x => {
        return x.includes('fill')
    })

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

    div {
        position: absolute;
        margin-left: 50px;
        overflow: hidden;
        margin-bottom: 40px;
        box-shadow: var(--cf-box-shadow);
        border-radius: var(--cf-border-radius);
        background: white;
        width: 200px;
        padding: 10px;
        height: 300px;
        overflow-y: auto;
        box-sizing: content-box;

    }

    div span {
        float: left;
        margin: 3px;
        width: calc(25% - 8px);
        text-align: center;
        line-height: 37px;
        font-size: 14px;
        color: var(--cf-primary-text);
        border: 1px solid #eeeeee;
        border-radius: 3px;
        transition: all 0.1s;
        cursor: pointer;
    }

    div span:hover {
        background-color: #eeeeee;
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
        <div>
            {#each filtered as icon}
                <span on:click={() => {value = icon; toggle()}}>
                    <i class={icon}></i>  
                </span>
            {/each}
        </div>    
    {/if}
</ClickOutside>