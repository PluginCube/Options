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
    
    $: vfields = visiableFields(fields, $values[id])
</script>

<style>
    h2 {
        color: var(--pco-secondary-text);
        text-transform: capitalize;
        margin: 0px 0 60px;
        font-size: 22px;
        line-height: 22px;
        font-weight: 800;
    }
</style>

<section>
    <h2>{title}</h2>

    {#each vfields as field (field.id)}
        <Field
            bind:value={$values[id][field.id]}
            args={field}
            errors={getErrors(field.id)}
            mini={false}
            animate={true}
        />
    {/each}
</section>