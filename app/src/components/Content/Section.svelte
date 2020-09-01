<script>
    export let id
    export let title
    export let description = null
    export let fields

    import { values, errors } from 'store'
    import Field from './Field.svelte'

</script>

<style>
    h2 {
        color: var(--cf-primary-text);
        text-transform: capitalize;
        margin: 0 0 40px;
        font-size: 24px;
        line-height: 24px;
        font-family: 'Josefin Sans', sans-serif;
        font-weight: bold;
    }
</style>

<section>
    <h2>{title}</h2>

    {#each Object.entries(fields) as [fid, field]}
        <Field  {...field} bind:value={$values[id][fid]}/>
    {/each}
</section>