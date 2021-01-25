<script>
    export let value
    export let args

    import SvelteTooltip from 'svelte-tooltip'

    import merge from 'deepmerge'

    $: args = merge(
        {
            choices: [],
            multiple: false,
        },
        args
    )

    $: if (args.multiple) {
        if (!value) {
            value = []
        }
    }

    let select = (id) => {
        if (args.multiple) {
            if (selected(id)) {
                value = value.filter((i) => i !== id)
            } else {
                value = [...value, id]
            }
        } else {
            value = id
        }
    }

    $: selected = (id) => {
        if (value) {
            if (args.multiple) {
                return value.includes(id)
            } else {
                return value === id
            }
        }

        return false
    }
</script>

<style lang="scss">
    ul {
        float: left;
        margin: 0;
        padding: 0;
        box-shadow: var(--pco-box-shadow);
        border: var(--pco-control-border);
        border-radius: var(--pco-border-radius);

        li {
            float: left;
            margin: 0px;
            color: var(--pco-primary-text);
            line-height: 12px;

            &.selected i {
                background: #f8f5f5;
                color: var(--pco-brand);
            }

            i {
                float: left;
                line-height: 36px;
                width: 40px;
                text-align: center;
                background: #fff;
                font-size: 15px;
                cursor: pointer;
            }

            &:first-of-type i {
                border-radius: var(--pco-border-radius) 0 0
                    var(--pco-border-radius);
            }

            &:last-of-type i {
                border-radius: 0 var(--pco-border-radius)
                    var(--pco-border-radius) 0;
            }

            &:global {
                .tooltip-wrapper {
                    float: left;
                }

                .tooltip {
                    box-shadow: var(--pco-box-shadow);
                }
            }
        }
    }
</style>

<ul>
    {#each args.choices as choice}
        <li
            class={selected(choice.id) ? 'selected' : null}
            on:click={() => select(choice.id)}
        >
            <SvelteTooltip tip={choice.title} color="#ffffff" top>
                <i class={choice.icon} />
            </SvelteTooltip>
        </li>
    {/each}
</ul>