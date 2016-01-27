'use strict';

import React from 'react';

class NavBar extends React.Component {
	render() {
		return (
			<div className="navbar navbar-light bg-faded">
				<a href="/" className="navbar-brand">{this.props.title}</a>
				<ul className="nav navbar-nav">
					{this.props.children}
				</ul>
			</div>
		);
	}
}

export default NavBar;