<script>
    import Section from './Section'
    import { sections, activeSection } from 'store'
</script>

<style>
    div {
        display: block;
        float: right;
        width: calc(100% - 180px);
        box-sizing: border-box;
        padding: 0px 0 25px 80px;
    }
</style>

<div>
    {#each $sections as section}
        {#if $activeSection == section.id}
            <Section {...section} />
        {/if}
    {/each}
</div>