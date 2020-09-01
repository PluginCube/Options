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
    {#each Object.entries($sections) as [id, section]}
        {#if $activeSection == id}
            <Section {id} {... section}/>   
        {/if}
    {/each}    
</div>