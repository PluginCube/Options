<script>
    export let categories
    export let category
    export let style

    import { translation } from 'store'
</script>

<style>
    div {
        float: left;
        width: 100%;
        padding: 12px 14px;
        box-sizing: border-box;
        border-bottom: 1px solid #eee;
    }

    div select {
        width: calc(100% - 70px);
        float: left;
        background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='20' viewBox='0 0 24 24' width='20' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
        background-repeat: no-repeat;
        background-position-x: calc(100% - 5px);
        color: var(--co-primary-text);
        background-size: 15px;
        border: var(--co-control-border);
        margin: 0;
        padding: 0px 10px;
        font-size: 13px;
        border-radius: var(--co-border-radius);
        background-color: #eee;
    }

    div select:last-of-type {
        width: 65px;
        float: right;
    }
</style>

<div>
    <select bind:value={category}>
        {#each categories as cat}
            <option value={cat}>{cat}</option>
        {/each}
    </select>

    <select bind:value={style}>
        <option value="fill">Fill</option>

        <option value="line">Line</option>
    </select>
</div>