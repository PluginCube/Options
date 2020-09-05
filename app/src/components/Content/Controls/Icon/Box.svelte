<script>
    export let value;

    import { categories } from '@iconify/json/json/ri.json'
    import { onMount, onDestroy, afterUpdate } from 'svelte'
    
    import Header from './Header.svelte'

    import PerfectScrollbar from 'perfect-scrollbar';
    import 'perfect-scrollbar/css/perfect-scrollbar.css'

    let box;
    let ps;
    let style = "fill";
    let category = "System";

    $: filtered = categories[category].filter(x => {
        return x.includes(style)
    })

    $: icons = filtered.map(i => 'ri-' + i);

    onMount(() => {
        ps = new PerfectScrollbar(box);
    });

    afterUpdate(() => {
        ps.update();
    });

    onDestroy(() => {
        ps.destroy();
        ps = null;
    });
</script>

<style>
    div {
        position: absolute;
        margin-left: 85px;
        margin-bottom: 40px;
        box-shadow: var(--cf-box-shadow);
        border-radius: var(--cf-border-radius);
        background: white;
        width: 220px;
        max-height: 260px;
        overflow: hidden;
    }

    ul {
        border-radius: var(--cf-border-radius);
        background: white;
        width: 100%;
        box-sizing: border-box;
        padding: 10px;
        max-height: 210px;
        position: relative;
    }

    div ul li {
        float: left;
        margin: 4px;
        width: calc(25% - 10px);
        text-align: center;
        line-height: 38px;
        font-size: 14px;
        color: var(--cf-primary-text);
        border: 1px solid #eeeeee;
        border-radius: var(--cf-border-radius);
        transition: all 0.1s;
        cursor: pointer;
        padding-top: 1px;
    }

    div ul li:hover {
        background-color: #eeeeeeba;
    }
</style>


<div>
    <Header bind:style bind:category categories={Object.keys(categories)}/>

    <ul bind:this={box}>
        {#each icons as icon}
            <li on:click={() => {value = icon}}>
                <i class={icon}></i>  
            </li>
        {/each}
    </ul>
</div>    
