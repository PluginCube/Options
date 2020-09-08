<script>
    import { translation, values } from 'store'
    import { save } from 'methods'

    let reader;

    $: fileSelected = (e) => {
        let files = event.target.files;

        try {            
            if ( ! files.length ) {
                alert($translation.no_file_selected);
                return;
            }

            let file = files[0];
            reader = new FileReader();

            reader.onload = (event) => {
                let data = JSON.parse(event.target.result);

                if( confirm($translation.override_warning) ){
                    values.set(data);
                    jQuery('#cf nav > button').click()
                }

                e.target.value = '';
            };

            reader.readAsText(file);


        } catch (err) {
            console.error(err);
        }    
    };
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
    <input on:change={fileSelected} type="file" accept="application/json"/>

    <span class="button button-primary" type="input">
        {$translation.select_file}
    </span>
</label>