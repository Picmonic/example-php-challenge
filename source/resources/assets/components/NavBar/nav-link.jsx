'use strict';

import React from 'react';

class NavLink extends React.Component {
	render() {
		return (
			<li className="nav-item {this.props.active ? 'active' : ''}">
				<a href="{this.props.url}" className="nav-link">{this.props.children}</a>
			</li>
		);
	}
}

export default NavLink;