<script>
    import { translation } from 'store'
    import { save } from 'methods'

    import Button from '../Comman/Button.svelte'
    let style = 'margin: 60px 5px; width: 175px;'
    let disabled = false

    let handleSave = async () => {
        disabled = true;
        await save();
        disabled = false;
    }
</script>

<Button {disabled} on:click={handleSave} {style}>
    {$translation.save_changes}
</Button>
