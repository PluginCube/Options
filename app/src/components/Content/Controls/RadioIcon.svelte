<script>
    export let value
    export let options

    import SvelteTooltip from 'svelte-tooltip';

    import merge from 'deepmerge'

    $: options = merge({
        choices: [],
        multiple: false
    }, options)
    
    $: if (options.multiple) {
        if (! value) {
            value = [];
        }
    }

    let select = (id) => {
        if (options.multiple) {
            if (selected(id)) {
                value = value.filter(i => i !== id);
            } else {
                value = [...value, id]
            }
        } else {
            value = id;
        }
    }

    $: selected = (id) => {
        if (value) {
            if (options.multiple) {
                return value.includes(id);
            } else {
                return value === id;
            }
        }
        
        return false;
    }
</script>

<style lang="scss">
    ul {
        float: left;
        margin: 0;
        padding: 0;
        box-shadow: var(--cf-box-shadow);
        border: var(--cf-control-border);

        li {
            float: left;
            margin: 0px;
            color: var(--cf-secondary-text);
            line-height: 12px;

            &.selected i{
                background: #f8f5f5;
                color: var(--cf-brand);
            }

            i {
                float: left;
                line-height: 35px;
                width: 40px;
                text-align: center;
                background: #fff;
                font-size: 15px;
                cursor: pointer;
            }

            &:first-of-type i {
                border-radius: var(--cf-border-radius) 0 0 var(--cf-border-radius);
            }

            &:last-of-type i {
                border-radius: 0 var(--cf-border-radius) var(--cf-border-radius) 0;
            }

            &:global{
                .tooltip-wrapper {
                    float: left;
                }

                .tooltip{
                    box-shadow: var(--cf-box-shadow);
                } 
            } 
        }
    }
</style>

<ul>
    {#each options.choices as choice}
        <li class={selected(choice.id) ? 'selected': null} on:click={() => select(choice.id)}>
            <SvelteTooltip tip={choice.title} color="#ffffff" top>
                <i class={choice.icon}></i>
            </SvelteTooltip>
        </li>
    {/each}
</ul>