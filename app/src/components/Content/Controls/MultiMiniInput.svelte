<script>
    export let value = {}
    export let args

    import merge from 'deepmerge'

    $: args = merge(
        {
            choices: [],
        },
        args
    )

    $: if (!value) {
        value = {}
    }

    import MiniInput from './MiniInput'
</script>

<style lang="scss">
    ul {
        float: left;
        margin-right: -10px;

        li {
            float: left;
            margin: 0px 10px 10px 0px;
            max-width: calc(50% - 10px);
        }
    }
</style>

<ul>
    {#each args.choices as choice}
        <li>
            <MiniInput bind:value={value[choice.id]} args={choice} />
        </li>
    {/each}
</ul>