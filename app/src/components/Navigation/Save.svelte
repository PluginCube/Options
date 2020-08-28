<script>
    import { translation } from 'store'
    import { save } from 'methods'

    import Button from '../Comman/Button.svelte'

    let style = 'margin-left: 5px; width: 175px;'
</script>

<Button on:click={() => save()} {style}>
    {$translation.save_changes}
</Button>
