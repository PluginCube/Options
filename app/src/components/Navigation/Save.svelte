<script>
    import { translation } from 'store'

    import { save } from 'methods'

    import Button from '../Comman/Button'

    let style = `
        position: absolute;
        width: 150px;
        height: 38px;
        bottom: 20px;
        left: 20px;
        font-weight: 700;
        color: #ffffff;
        background-color: #02b875;`

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