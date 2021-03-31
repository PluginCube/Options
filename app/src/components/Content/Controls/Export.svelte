<script>
    export let args

    import { translation, values, id } from 'store'

    import Button from '../../Comman/Button'

    import { saveAs } from 'file-saver'

    import merge from 'deepmerge'

    $: args = merge(
        {
            filename: null,
            append_date: true,
        },
        args
    )

    let download = () => {
        let dt = new Date()
        let date =
            '_' +
            dt.getFullYear() +
            '_' +
            (dt.getMonth() + 1) +
            '_' +
            dt.getDate()

        let fileName = $id + '_args_backup'

        if (args.filename) {
            fileName = args.filename
        }

        if (args.append_date) {
            fileName = fileName + date
        }

        let fileToSave = new Blob([JSON.stringify($values)], {
            type: 'application/json',
            name: fileName + '.json',
        })

        saveAs(fileToSave, fileName)
    }
</script>

<style>
</style>

<Button small on:click={download}>
    {$translation.download_data}
</Button>
