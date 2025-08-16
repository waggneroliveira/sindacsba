@extends('client.core.client')

@section('content')
<div class="container mx-auto p-4">
    <div id="calendar"></div>
    <div id="events-list" class="mt-6"></div>
</div>

<style>
    /* Calendário básico */
    #calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
    }
    #calendar .header span{
        color: #000;
    }
    .event-item strong{
        color: #4f46e5;
    }
    .event-item{
        color: black;
    }
    .day {
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd;
        cursor: pointer;
        color: #000;
        position: relative;
    }
    .day.event {
        /* background-color: #4f46e5; */
        color: black;
        font-weight: bold;
        border-radius: 5px;
    }
    /* Indicador de múltiplos eventos */
    .day.multiple::after {
        content: '•';
        position: absolute;
        bottom: 5px;
        right: 5px;
        color: yellow;
        font-size: 16px;
    }
    .header {
        grid-column: span 7;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    .header button {
        background-color: #4f46e5;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 5px;
    }
    .weekdays {
        display: contents;
    }
    .weekday {
        font-weight: bold;
        text-align: center;
        padding: 5px 0;
    }
    #events-list {
        border-top: 1px solid #ddd;
        padding-top: 10px;
    }
    .event-item {
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .event-item a {
        color: #4f46e5;
        text-decoration: underline;
    }
</style>

<script>
const events = [
    { date: '2025-08-10', title: 'Reunião com Cliente', description: 'Discussão do projeto X', link: '#' },
    { date: '2025-08-10', title: 'Revisão do Contrato', description: 'Revisão de termos com equipe jurídica', link: '#' },
    { date: '2025-08-15', title: 'Entrega do Relatório', description: 'Finalização do relatório mensal', link: '#' },
    { date: '2025-08-20', title: 'Workshop', description: 'Treinamento interno', link: '#' }
];

const holidays = [
    '2025-08-07', // Exemplo feriado
];

let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();

const calendarEl = document.getElementById('calendar');
const eventsListEl = document.getElementById('events-list');

function renderCalendar(month, year) {
    calendarEl.innerHTML = '';

    // Header com navegação
    const header = document.createElement('div');
    header.className = 'header';
    header.innerHTML = `
        <button onclick="prevMonth()">&#8592;</button>
        <span>${new Date(year, month).toLocaleString('default', { month: 'long' })} ${year}</span>
        <button onclick="nextMonth()">&#8594;</button>
    `;
    calendarEl.appendChild(header);

    // Dias da semana
    const weekdays = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
    weekdays.forEach(day => {
        const div = document.createElement('div');
        div.className = 'weekday';
        div.textContent = day;
        calendarEl.appendChild(div);
    });

    // Dias do mês
    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    // Espaços vazios para alinhar o primeiro dia
    for (let i = 0; i < firstDay; i++) {
        const empty = document.createElement('div');
        calendarEl.appendChild(empty);
    }

   for (let day = 1; day <= daysInMonth; day++) {
    const fullDate = `${year}-${String(month+1).padStart(2,'0')}-${String(day).padStart(2,'0')}`;
    const dayEl = document.createElement('div');
    dayEl.className = 'day';
    
    const dayEvents = events.filter(e => e.date === fullDate);

    // Texto do dia
    const dayNumber = document.createElement('div');
    dayNumber.textContent = day;
    dayNumber.style.fontWeight = 'bold';
    dayEl.appendChild(dayNumber);

    // Adiciona eventos dentro do dia
    dayEvents.forEach(ev => {
        const evDiv = document.createElement('div');
        evDiv.textContent = ev.title;
        evDiv.style.fontSize = '10px';
        evDiv.style.overflow = 'hidden';
        evDiv.style.textOverflow = 'ellipsis';
        evDiv.style.whiteSpace = 'nowrap';
        evDiv.style.marginTop = '2px';
        evDiv.style.backgroundColor = '#4f46e5'; 
        evDiv.style.color = 'white';            
        evDiv.style.padding = '2px 4px';        
        evDiv.style.borderRadius = '3px';       
        evDiv.style.cursor = 'pointer';         
        dayEl.appendChild(evDiv);
    });

    if(dayEvents.length > 0){
        dayEl.classList.add('event');
    }
    if (holidays.includes(fullDate)) {
        dayEl.style.border = '2px solid red';
    }

    dayEl.addEventListener('click', () => renderEvents(fullDate));
    calendarEl.appendChild(dayEl);
}


    // Lista eventos do mês
    renderEventsMonth(month, year);
}

function renderEventsMonth(month, year) {
    eventsListEl.innerHTML = '';
    const monthEvents = events.filter(e => {
        const date = new Date(e.date);
        return date.getMonth() === month && date.getFullYear() === year;
    });

    monthEvents.forEach(e => {
        const div = document.createElement('div');
        div.className = 'event-item';
        div.innerHTML = `
            <strong>${new Date(e.date).toLocaleDateString()}</strong>: ${e.title}<br>
            ${e.description} <br>
            <a href="${e.link}">Acessar</a>
        `;
        eventsListEl.appendChild(div);
    });

    if (monthEvents.length === 0) {
        eventsListEl.innerHTML = '<p>Nenhum evento neste mês.</p>';
    }
}

function renderEvents(date) {
    const dayEvents = events.filter(e => e.date === date);
    eventsListEl.innerHTML = '';

    if(dayEvents.length === 0) {
        eventsListEl.innerHTML = '<p>Nenhum evento neste dia.</p>';
        return;
    }

    dayEvents.forEach(e => {
        const div = document.createElement('div');
        div.className = 'event-item';
        div.innerHTML = `
            <strong>${new Date(e.date).toLocaleDateString()}</strong>: ${e.title}<br>
            ${e.description} <br>
            <a href="${e.link}">Acessar</a>
        `;
        eventsListEl.appendChild(div);
    });
}

function prevMonth() {
    currentMonth--;
    if(currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    renderCalendar(currentMonth, currentYear);
}

function nextMonth() {
    currentMonth++;
    if(currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    renderCalendar(currentMonth, currentYear);
}

renderCalendar(currentMonth, currentYear);
</script>
@endsection
