<script>
    import Section from './Section'
    import { sections, activeSection } from 'store'

    $: section = $sections.find(x => x.id == $activeSection); 
</script>

<style>
    div {
        display: block;
        float: right;
        width: calc(100% - 190px);
        box-sizing: border-box;
        padding: 45px;
        min-height: 650px;
    }
</style>

<div>
    {#if section}
        <Section {...section} />
    {/if}
</div>