<script>
    export let section
    export let title
    export let icon

    import { activeSection } from 'store'
</script>

<li
    class:active={$activeSection === section}
    on:click={() => activeSection.set(section)}
>
    <a href="#{section}"> <i class={icon} /> {title} </a>
</li>