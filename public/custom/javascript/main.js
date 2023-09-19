
const form_quote = document.querySelector('.quotation-form')
const float_button = document.querySelector('.floating-button')
const message_floating = document.querySelector('.message-floating')

function showQuotation() {
    form_quote.style.right = '30px'
    float_button.style.right = '-100px'
}

function hideQuotation() {
    form_quote.style.right = '-300px'
    float_button.style.right = '30px'
}

function closeQuotation() {
    message_floating.style.display = 'none'
}

const service_modal_title = document.querySelector('.service-modal-title')
const service_desc = document.querySelector('.service-desc')
const service_img = document.querySelector('.img-service-modal')

function getServiceValue(name) {
    service_modal_title.innerText = name

    if (name == "IT SERVICES BY PROJECT & SERVICE LEVEL AGREEMENT") {
        service_desc.innerText = "Infrastructure Development. Application Administration & Maintainance. Enterprise System Integration. Telecomunication System Integration & Managed Services. Outsourcing & Joint Development Services"
        service_img.setAttribute('src', '/custom/icon/Group 108.png')
    } else if (name == "HARDWARE INTEGRATION & IMPLEMENTATION") {
        service_desc.innerText = "Network Blue Printing & Architecture. Network Administration & Maintainance. Network & Infrastructure Deployment, Enterprise Network Solutions. Carrier Grade Network Management Services."
        service_img.setAttribute('src', '/custom/icon/Group 109.png')

    } else if (name == "24/7 SUPPORT") {
        service_desc.innerText = "Available Support Any Time. Operate Continuously At All Times With Complete Shoft Staff."
        service_img.setAttribute('src', '/custom/icon/Group 110.png')

    } else if (name == "CABLING SYSTEM INSTALLATION") {
        service_desc.innerText = "Network Cabling Termination. Fiber Optic Cabling Deployment. Electrical Cabling Solution"
        service_img.setAttribute('src', '/custom/icon/Group 111.png')

    } else if (name == "APLICATION & SERVICE IMPLEMENTATION") {
        service_desc.innerText = "Application Architectures Supporting Digital Business, Mobile, Cloud And APIs Include Services That Integrate Exiting Assets Or Implement New Capabilities"
        service_img.setAttribute('src', '/custom/icon/Group 112.png')

    } else {
        service_desc.innerText = "Physical Building Security Solution. Enterprise Specific Security Services. Integrated Security"
        service_img.setAttribute('src', '/custom/icon/Group 113.png')

    }
}


const btn_team = document.querySelector('.btn-team')
const modal_title = document.querySelector('.modal-title')
const modal_desc = document.querySelector('.team-desc')
const modal_img = document.querySelector('.img-team-modal')

function getValue(name) {
    modal_title.innerText = name

    if (name == "Sales Account Manager") {
        modal_desc.innerText = "The goal of our Sales Account Manager Team is to always be aware of the specific needs of our costumers with respect to the current technical field. Our Sales Department proudly consist of experienced professionals dedicated to creating anf advertising services that are personalized to each client. As part of our strategy, we focus on finding the most beneficial balance between const and benefit"
        modal_img.setAttribute('src', '/custom/icon/sales account.png')

    } else if (name == "Project Manager") {
        modal_desc.innerText = "Project Managers are responsible for planning, procuring, and executing projects in any setting with a defined scope and timeframe, regardless of the industry. Prior to escalating a problem to higher authorities, the project manager is the point of contact for issues or discrepancies arising from the heads of various departs within an organization"
        modal_img.setAttribute('src', '/custom/icon/project manager.png')

    } else if (name == "Professional Service") {
        modal_desc.innerText = "Tasked with helping to meet sales and service growth goals, as well as supporting productivity and profitability objectives of a sales team, is our Professional Service. This role involves working in conjunction with other departments such as services, engineering and technical support to guarantee that costumers are getting exactly that they need from any implemented projects, while also making sure that key costumer personnel have proper support"
        modal_img.setAttribute('src', '/custom/icon/professional service.png')

    } else if (name == "Maintenance and Managed Service") {
        modal_desc.innerText = "Generally, managed services are considered an IT Support team, it is possible to contact them 24 hours a day if you encounter any problems with your system or if you require assistance troubleshooting some issues. They are also responsible for performing maintenance task and ensuring that things are running smoothly"
        modal_img.setAttribute('src', '/custom/icon/maintenance and managed service.png')

    } else if (name == "Business Development") {
        modal_desc.innerText = "The Business Development evaluates the possibility of partnering with a new product with a new product and reviews the certification of our technical team members. We are faching a challenge of the future, since our solutions are not just aimed at selling products, but also at providing our costumers with the best possible solutions."
        modal_img.setAttribute('src', '/custom/icon/business development.png')

    } else {
        modal_desc.innerText = "Applications Services provide the capabilities that are need to support business activities. Application Services represent well-defined components of functional behavior that provide a logical method of grouping Application Function. A service-based approach would be beneficial, especially if you are considering introducing one. However, this approach is not mandatory. In addon, the Application Service offers you the opportunity to capture how you intend to structure and provide application functionality before you select the ‘real’ applications that you will buy or build in order to fulfill these Application Services."
        modal_img.setAttribute('src', '/custom/icon/applicaition service.png')

    }
}

const key_desc = document.querySelector('.key-desc')
key_desc.style.display = 'none'
const key_desc_value = document.querySelector('.key-desc-value')
const key_title = document.querySelector('.key-title-value')
const arrow1 = document.querySelector('#arrow1')
const arrow2 = document.querySelector('#arrow2')
const arrow3 = document.querySelector('#arrow3')
const arrow4 = document.querySelector('#arrow4')

function showKeyDesc(index) {
    console.log(index);
    if (index == 1) {
        key_desc.style.display = 'block'
        key_desc_value.innerText = "Infrastructure deployment, Aplication administration & maintenance, Enterprise system integration, Telecomunication system integration, Information & technology, operation & managed services, Outsourcing & joint development services"
        key_title.innerText = "IT Service by Project & Service Level Agreement (SLA)"
        arrow1.style.display = 'block'
        arrow2.style.display = 'none'
        arrow3.style.display = 'none'
        arrow4.style.display = 'none'
    } else if (index == 2) {
        key_desc.style.display = 'block'
        key_desc_value.innerText = "Network Blueprinting & Architecture, Network Administration & Maintenance, Network & Infrastructure Deployment, Enterprise Network Solutions,  Carrier Grade Network Management Service, Physical Building Security Solution, Enterprise Specific Security Services, Integrated Security Audit"
        key_title.innerText = "Hardware Integration & Implementation"
        arrow1.style.display = 'none'
        arrow2.style.display = 'block'
        arrow3.style.display = 'none'
        arrow4.style.display = 'none'
    } else if (index == 3) {
        key_desc.style.display = 'block'
        key_desc_value.innerText = "Network Cabling Termination, Fiber Optic, Cabling Deployment, Electrical Cabling Solution, Fire Alarm Solution"
        key_title.innerText = "Cabling System Installation"
        arrow1.style.display = 'none'
        arrow2.style.display = 'none'
        arrow3.style.display = 'block'
        arrow4.style.display = 'none'
    } else if (index == 4) {
        key_desc.style.display = 'block'
        key_desc_value.innerText = "Application architectures supporting digital business, mobile, cloud and APIs include services that integrate exiting assets or implement new capabilities"
        key_title.innerText = "Application & Cloud Implementation"
        arrow1.style.display = 'none'
        arrow2.style.display = 'none'
        arrow3.style.display = 'none'
        arrow4.style.display = 'block'
    }
}

function privacy() {
    const check_quote = document.querySelector('.quotate-check')


    if (check_quote.checked == true) {
        document.getElementById("btn-quote").disabled = false;

    } else {
        document.getElementById("btn-quote").disabled = true;

    }
}


