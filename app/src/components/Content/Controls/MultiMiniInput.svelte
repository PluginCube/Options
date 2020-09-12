<script>
    export let value = {}
    export let options

    import { beforeUpdate } from 'svelte'

    import MiniInput from './MiniInput'

    beforeUpdate(() => {
        if (!value) {
            value = {}
        }
    })
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
    {#each options.choices as choice}
        <li>
            <MiniInput bind:value={value[choice.id]} options={choice} />
        </li>
    {/each}
</ul>