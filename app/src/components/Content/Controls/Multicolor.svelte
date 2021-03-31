<script>
    export let value
    export let args

    import merge from 'deepmerge'

    if (!value) {
        value = {}
    }

    $: args = merge(
        {
            choices: [],
        },
        args
    )

    import SvelteTooltip from 'svelte-tooltip'

    import Color from './Color'
</script>

<style lang="scss">
    ul {
        float: left;
        margin: 0;
        padding: 0;

        li {
            float: left;
            margin-right: 10px;
            color: var(--pco-secondary-text);

            &:global .tooltip {
                box-shadow: var(--pco-box-shadow);
                visibility: visible;
            }
        }
    }
</style>

<ul>
    {#each args.choices as choice}
        <li>
            <SvelteTooltip tip={choice.title} color="var(--pco-control-bg)" top>
                <Color bind:value={value[choice.id]} />
            </SvelteTooltip>
        </li>
    {/each}
</ul>