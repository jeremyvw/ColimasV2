{% extends 'template/layout.volt' %}
{% block content %}
<div class="container-fluid">
    <div class="page-header" style="text-align: center;">
        <h2>Upgraded Requests</h2>
    </div>
    <br>
    <div>
        {{ flashSession.output() }}
    </div>
    <table class="table">
        <thead>
            <tr class="center aligned">
                <th>ID</th>
                <th>Username</th>
                <th>Upgrade Date</th>
                <th>Upgrade Accept Date</th>
                <th>Upgrade Status</th>
                <!-- {% if session.get('auth')['category'] == 0 %} -->
                <th>Action</th>
                <!-- {% endif %} -->
            </tr>
        </thead>
        <tbody>
            {% for upgrade in upgrades %}
            <tr class="center aligned">
                <td>{{upgrade.UPGRADE_ID}}</td>
                <td>{{upgrade.users.USER_NAME}}</td>
                <td>{{upgrade.UPGRADE_REQUESTDATE}}</td>
                <td>{{upgrade.UPGRADE_RESPONDEDTIME}}</td>
                <td>{{upgrade.UPGRADE_STATUS}}</td>

                <!-- {% if session.get('auth')['category'] == 0 %} -->
                <td>
                    <a href="{{url('/upgrade/edit/'~upgrade.UPGRADE_ID)}}" class="btn btn-info">Accept</a>
                </td>
                <!-- {% endif %} -->
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}