<script>
    export let title
</script>

<style>
    li {
        float: left;
        width: 100%;
        margin: 0px 0px 5px 0px;
    }

    span {
        margin-top: 17px;
        float: left;
        width: 100%;
        margin-bottom: 10px;
        color: #a2a2a2;
        padding-left: 8px;
        font-size: 12px;
    }

    li:first-child span {
        margin-top: 0;
    }

</style>

<li>
    <span>{title}</span>
</li>