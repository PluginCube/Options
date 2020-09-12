<script>
    export let id
    export let title
    export let icon

    import { activeSection } from 'store'
</script>

<li
    class:active={$activeSection === id}
    on:click={() => activeSection.set(id)}
>
    <a href="#{id}"> <i class={icon} /> {title} </a>
</li>