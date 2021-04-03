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

<style lang="scss">
    :global(.selectContainer) {
        width: 220px;
        max-width: 100%;
        font-size: 13px;
        border: var(--pco-control-border) !important;
        box-shadow: var(--pco-box-shadow) !important;
        border-radius: var(--pco-border-radius) !important;

        box-sizing: border-box;
        --height: 36px;
        --indicatorWidth: 12px;
        --indicatorHeight: 12px;
        --multiItemHeight: 26px;
        --padding: 0 12px !important;
        --multiItemPadding: 0px 12px;
        --multiLabelMargin: 0px -2px;
        --multiItemMargin: 6px 12px 0px -8px;
        --indicatorColor: var(--pco-secondary-text);
        --indicatorRight: 12px;
        --multiSelectPadding: 0px 14px;
        --inputFontSize: 13px;
        
        :global(.indicator) {
            opacity: .35;
        }
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