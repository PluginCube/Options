<script>
    export let id
    export let title
    export let fields

    import { values, errors } from 'store'
    import Field from './Field.svelte'

    $: returnErrors = (fid) => {
        if ($errors[id] && $errors[id][fid]) {
            return $errors[id][fid];
        }

        return false;
    }
</script>

<style>
    h2 {
        color: var(--cf-primary-text);
        text-transform: capitalize;
        margin: 0 0 30px;
        font-size: 23px;
        line-height: 23px;
        font-family: 'Josefin Sans', sans-serif;
        font-weight: bold;
    }
</style>

<section>
    <h2>{title}</h2>

    {#each Object.entries(fields) as [fid, field]}
        <Field errors={returnErrors(fid)} {...field} bind:value={$values[id][fid]}/>
    {/each}
</section>