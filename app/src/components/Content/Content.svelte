<script>
    import Section from './Section'
    import { sections, activeSection } from 'store'

    $: section = $sections.find(x => x.id == $activeSection); 
</script>

<style>
    div {
        display: block;
        float: right;
        width: calc(100% - 185px);
        box-sizing: border-box;
        padding: 0px 0 25px 80px;
    }
</style>

<div>
    {#if section}
        <Section {...section} />
    {/if}
</div>