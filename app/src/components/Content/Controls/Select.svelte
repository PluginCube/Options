<script>
    import { values } from 'store'

    export let value
    export let args

    import merge from 'deepmerge'

    $: args.choices = merge(args.choices, []);

    
    /**
     *  Lookup Examples:
     * 
     *  data.section.field                for getting values from a repeater in a section
     *  args.activeItemValues.fields      for gettings values from a repeater in the current repeater item. 
    */

    $: if ( args.lookup ) {
        let data = $values;
        
        try {
            let lookupItems = eval(args.lookup);

            args.choices = lookupItems.map(i => {
                return {
                    id: i['_id'],
                    title: i[Object.keys(i)[0]]
                }
            });
        } catch (error) {
            console.log(error);
        }
    }

</script>

<style lang="scss">
    select {
        width: 200px;
        max-width: 100%;
        padding: 5px 12px;
        padding-right: 35px;
        font-size: 13px;
        border: var(--co-control-border);
        box-shadow: var(--co-box-shadow);
        border-radius: var(--co-border-radius);
        background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
        background-repeat: no-repeat;
        background-position-x: calc(100% - 10px);
        margin: 0;

        option {
            font-size: 14px;
        }
    }
</style>

<select bind:value>
    {#each args.choices as choice}
        <option value={choice.id}>{choice.title}</option>
    {/each}
</select>