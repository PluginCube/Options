<script>
    export let value;

    import { categories } from '@iconify/json/json/ri.json'
    import { onMount, onDestroy } from 'svelte';
    import PerfectScrollbar from 'perfect-scrollbar';
    import 'perfect-scrollbar/css/perfect-scrollbar.css'

    let box;
    let ps;
    let icons = [];

    Object.keys(categories).forEach(cat => {
        categories[cat].forEach(icon => {
            icons.push('ri-' + icon);
        });
    });

    $: filtered = icons.filter(x => {
        return x.includes('fill')
    })

    onMount(() => {
        ps = new PerfectScrollbar(box);
    });

    onDestroy(() => {
        ps.destroy();
        ps = null;
    });
</script>

<style>
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


<div bind:this={box}>
    {#each filtered as icon}
        <span on:click={() => {value = icon}}>
            <i class={icon}></i>  
        </span>
    {/each}
</div>    
