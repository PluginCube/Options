<script>
    import { values } from 'store'
    import Select from 'svelte-select';

    export let value
    export let args

    import merge from 'deepmerge'

    $: args.choices = merge(args.choices, []);

    $: value = value || null;
    
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
                    value: i['_id'],
                    label: i[Object.keys(i)[0]]
                }
            });
        } catch (error) {
            console.log(error);
        }
    }

    $: change = (e) => {
        if (args.attributes && args.attributes.isMulti) {
            value = e.detail
        } else {
            value = e.detail.value;
        }
    }

    $: clear = (e) => {
        value = null;
    }
</script>

<style>
    :global(.selectContainer) {
        width: 100%;
        max-width: 220px;
        font-size: 13px;
        border: var(--pco-control-border) !important;
        box-shadow: var(--pco-box-shadow) !important;
        border-radius: var(--pco-border-radius) !important;
        box-sizing: border-box;
        --height: 40px;
        --indicatorWidth: 16px;
        --indicatorHeight: 16px;
        --multiItemHeight: 24px;
        --multiItemPadding: 0px 10px;
        --multiLabelMargin: 0px;
    }
</style>

<div>
    <Select 
        items={args.choices}
        selectedValue={value}
        on:select={change}
        on:clear={clear}
        isClearable={false}
        showIndicator={true}
        multiFullItemClearable={true}
        {...args.attributes}>
    </Select>
</div>