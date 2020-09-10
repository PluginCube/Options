<script>
    export let value = {};
    export let options;

    import { beforeUpdate } from 'svelte'

    import MiniInput from './MiniInput.svelte'
    
    beforeUpdate(() => {
        if (! value) {
            value = {};
        }
    })
</script>

<style lang="scss">
    ul {
        float: left;
        margin: 0;

        li {
            float: left;
            margin: 0px 10px 10px 0px;
        }
    }
</style>

<ul>
    {#each options.choices as choice}
        <li>
            <MiniInput bind:value={value[choice.id]} bind:options={choice} />
        </li>
    {/each}
</ul>