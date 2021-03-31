<script>
    export let value
    export let args

    import merge from 'deepmerge'

    $: args = merge(
        {
            choices: [],
        },
        args
    )

    import SvelteTooltip from 'svelte-tooltip'
</script>

<style lang="scss">
    ul {
        float: left;
        margin: -5px -10px -5px 0px;
        padding: 0;

        li {
            float: left;
            max-width: calc(25% - 10px);
            margin: 5px 10px 5px 0px;
            box-sizing: border-box;
            display: block;
            padding: 0;
            cursor: pointer;
            border-radius: 10px;

            & :global {
                .tooltip-wrapper {
                    float: left;
                }

                .tooltip {
                    box-shadow: var(--pco-box-shadow);
                }
            }

            img {
                float: left;
                max-width: 100%;
            }

            &.selected img {
                float: left;
                box-sizing: border-box;
                outline: 3px solid #ccc;
            }
        }
    }
</style>

<ul>
    {#each args.choices as choice}
        <li
            class:selected={choice.id === value}
            on:click={() => {
                value = choice.id
            }}
        >
            <SvelteTooltip tip={choice.title} color="var(--pco-control-bg)" top>
                <img src={choice.img} alt={choice.title} />
            </SvelteTooltip>
        </li>
    {/each}
</ul>