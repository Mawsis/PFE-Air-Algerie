import logo from '../Assets/logo.png';
export default function ApplicationLogo(props) {
    return (
        <img src={logo} alt="Logo" {...props} />
    );
}
