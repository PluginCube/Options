<script>
    export let args

    import { translation, values } from 'store'

    import Button from '../../Comman/Button'

    import merge from 'deepmerge'

    let input

    let change = (e) => {
        let files = e.target.files

        try {
            if (!files.length) {
                alert($translation.no_file_selected)
                return
            }

            let file = files[0]
            let reader = new FileReader()

            reader.onload = (event) => {
                let data = JSON.parse(event.target.result);

                if (args.merge) {
                    data = merge($values, JSON.parse(event.target.result))
                }

                if (confirm($translation.override_warning)) {
                    values.set(data)
                    jQuery('#co nav > button').click()
                }

                e.target.value = ''
            }

            reader.readAsText(file)
        } catch (err) {
            console.error(err)
        }
    }
</script>

<style lang="scss">
    label {
        float: left;
        margin-right: 10px;
        width: 100%;

        input {
            display: none;
        }
    }
</style>

<label>
    <input on:change={change} bind:this={input} type="file" accept="application/json" />

    <Button type="input" on:click={() => input.click()}>
        {$translation.select_file}
    </Button>
</label>