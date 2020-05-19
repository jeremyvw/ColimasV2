{% extends 'template/layout.volt' %}
{% block content %}
<div class="container">
    <div class="page-header" style="text-align: center;">
        <h2>Upgraded Requests</h2>
    </div>
    <br>
    <div>
        {{ flashSession.output() }}
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Username</th>
                <th>Upgrade Date</th>
                <th>Upgrade Accept Date</th>
                <th>Upgrade Status</th>
                {% if session.get('auth') %}
                {% if session.get('auth')['category'] == 0 %}
                <th>Action</th>
                {% endif %}
                {% endif %}
            </tr>
        </thead>
        <tbody>
            {% for upgrade in upgrades %}
            <tr class="text-center">
                <td>{{upgrade.UPGRADE_ID}}</td>
                <td>{{upgrade.users.USER_NAME}}</td>
                <td>{{upgrade.UPGRADE_REQUESTDATE}}</td>
                <td>{{upgrade.UPGRADE_RESPONDEDTIME}}</td>
                {% if upgrade.UPGRADE_STATUS == 1 %}
                <td>Accepted</td>
                {% else %}
                <td>Pending</td>
                {% endif %}
                {% if session.get('auth') %}
                {% if session.get('auth')['category'] == 0 %}
                <td>
                    <a href="{{url('/upgrade/update/'~upgrade.UPGRADE_ID)}}" class="btn btn-info">Accept</a>
                </td>
                {% endif %}
                {% endif %}
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>
{% endblock %}