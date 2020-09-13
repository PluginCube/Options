<script>
    export let id
    export let title
    export let fields

    import { values, errors } from 'store'

    import { visiableFields } from 'methods'

    import Field from './Field'

    $: getErrors = (fid) => {
        if ($errors[id] && $errors[id][fid]) {
            return $errors[id][fid]
        }

        return false
    }

    $: if (typeof $values[id] !== 'object') $values[id] = {};

    $: fids = visiableFields(fields, $values[id])
</script>

<style>
    h2 {
        color: var(--cf-primary-text);
        text-transform: capitalize;
        margin: 0 0 35px;
        font-size: 23px;
        line-height: 23px;
        font-family: 'Josefin Sans', sans-serif;
        font-weight: bold;
    }
</style>

<section>
    <h2>{title}</h2>

    {#each fids as fid (fid)}
        <Field
            bind:value={$values[id][fid]}
            args={fields[fid]}
            errors={getErrors(fid)}
            mini={false}
            animate={true}
        />
    {/each}
</section>