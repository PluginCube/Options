<script>
    export let title
    export let icon
    export let url
</script>

<style>
    li {
        float: left;
        width: 100%;
        margin: 0px 0px 5px 0px;
    }

    a {
        color: var(--cf-primary-text);
        width: 100%;
        text-transform: capitalize;
        font-weight: 700;
        font-size: 14px;
        cursor: pointer;
        transition: .3s;
        position: relative;
        height: 34px;
        line-height: 34px;
        padding: 2px 10px;
        box-sizing: border-box;
        border-radius: 3px;
        color: inherit;
        text-decoration: none;
        float: left;
        font-family: Josefin Sans,sans-serif;
        outline: none;
        box-shadow: none;
    }

    i {
        float: left;
        margin-right: 15px;
        font-size: 18px;
        margin-top: -2px;
    }
</style>

<li>
    <a href={url} target="_blank">
        <i class={icon}></i>
        {title}
    </a>
</li>