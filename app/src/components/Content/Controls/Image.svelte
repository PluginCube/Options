<script>
    export let value;

    import { translation } from 'store'

    import Text from './Text.svelte'
    import Button from '../../Comman/Button.svelte'

    let select = () => {
        let frame;

        frame = wp.media({
            title: 'Select Image',
            multiple: false
        });
        
        frame.on( 'select', () => {
            let attachment = frame.state().get('selection').first().toJSON()
            value = attachment.url
        });

        frame.open();
    }
</script>

<Text bind:value options={{placeholder: $translation.image_url}}/>

<button on:click={select} style="margin-top: 15px" class="button button-small button-primary">
    {$translation.from_library}
</button>