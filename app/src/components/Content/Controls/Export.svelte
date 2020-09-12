<script>
    export let options;
    
    import { translation, values, id } from 'store'
    
    import { saveAs } from 'file-saver'

    let download = () => {
        let dt = new Date();
        let date = '_' + dt.getFullYear() + "_" + (dt.getMonth() + 1) + "_" + dt.getDate();

        let fileName = $id + '_options_backup';

        if(options.filename){
            fileName = options.filename;
        }

        if(options.append_date){
            fileName = fileName + date;
        }

        let fileToSave = new Blob([JSON.stringify($values)], {
            type: 'application/json',
            name: fileName + '.json'
        });
        
        saveAs(fileToSave, fileName);
    }
</script>

<style>
</style>

<button class="button button-primary" on:click={download}>
    {$translation.download_data}
</button>