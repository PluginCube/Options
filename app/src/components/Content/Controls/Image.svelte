<script>
    export let value

    import { translation } from 'store'

    import Text from './Text'

    import Button from '../../Comman/Button'

    let select = () => {
        let frame

        frame = wp.media({
            title: 'Select Image',
            multiple: false,
        })

        frame.on('select', () => {
            let attachment = frame.state().get('selection').first().toJSON()
            value = attachment.url
        })

        frame.open()
    }
</script>

<style>
    button {
        margin-top: 15px !important;
    }
</style>

<Text
    bind:value
    options={{ attributes: { placeholder: $translation.image_url } }}
/>

<button on:click={select} class="button button-primary button-small">
    {$translation.from_library}
</button>