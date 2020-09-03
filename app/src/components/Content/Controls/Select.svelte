<script>
    export let value
    export let options
    
    import Select from 'svelte-select';

    let change = (selected) => {
        value = selected.detail.value;
    };
</script>

<style>
    div {
        --height: 34px;
        --border: none;
        --borderRadius: var(--cf-border-radius);
        --clearSelectTop: 10px;
        width: 180px;
		box-shadow: var(--cf-box-shadow);
    }
</style>

<div>
    <Select on:select={change} bind:selectedValue={value} {...options}></Select>
</div>
