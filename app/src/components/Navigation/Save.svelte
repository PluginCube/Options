<script>
    import { translation } from 'store'

    import { save } from 'methods'

    import Button from '../Comman/Button'

    let style = 'margin: 50px 0px;width: 100%; height: 34px;'

    let disabled = false

    let handleSave = async () => {
        disabled = true
        await save()
        disabled = false
    }
</script>

<Button {disabled} on:click={handleSave} {style}>
    {$translation.save_changes}
</Button>