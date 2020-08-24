<script>
    import Section from './Section.svelte'
    import { sections, activeSection } from 'store'
</script>

<style>
    div {
        display: block;
        float: right;
        width: calc(100% - 180px);
        box-sizing: border-box;
        padding: 25px 0 25px 90px;
    }
</style>

<div>
    {#each $sections as section}
        {#if $activeSection == section.id}
            <Section {... section}/>   
        {/if}
    {/each}    
</div>