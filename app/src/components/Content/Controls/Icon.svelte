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
            icons.push(icon);
        });
    });

    $: filtered = icons.filter(x => {
        return x.includes('fill')
    })
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
        width: calc(20% - 8px);
        text-align: center;
        line-height: 30px;
        font-size: 14px;
        color: var(--cf-primary-text);
        border: 1px solid #eeeeee;
        border-radius: 3px;
    }
</style>


<ClickOutside on:clickoutside={() => {show = false}}>
    <span on:click={() => {show = !show}}>
        {#if value}
            <i class={value}></i>
        {:else}
            {$translation.select}
        {/if}
    </span>

    {#if show}
        <div>
            {#each filtered as icon}
                <span>
                    <i class="ri-{icon}"></i>  
                </span>
            {/each}
        </div>    
    {/if}
</ClickOutside>