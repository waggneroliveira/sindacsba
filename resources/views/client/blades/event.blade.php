@extends('client.core.client')

@section('content')

<style>
    .announcement{
        display: none;
    }
    @media (max-width: 600px) {
    #calendar {
        grid-template-columns: repeat(7, 1fr);
        font-size: 10px;
    }

    .day {
        min-height: 35px;
        padding: 1px;
    }

    .day-number {
        font-size: 10px;
    }

    #calendar .header {
        font-size: 12px;
    }

    #events-list, #holidays-block {
        font-size: 12px;
    }
    .day .event-badge {
        text-indent: -9999px; /* esconde o texto */
        overflow: hidden;
        width: 8px;
        height: 8px;
        padding: 0;
        min-height: inherit;
    }
    .event-list{
        flex-direction: row;
        flex-wrap: wrap;
    }
}
</style>

<div class="d-flex justify-content-start gap-2 align-items-start flex-nowrap mt-5 mb-3">
    <span class="firula-contact mt-2"></span>
    <div class="description">
        <h1 class="montserrat-bold font-30 mb-0 title-blue">Agenda</h1>
    </div>
</div>

<div class="container mx-auto p-4">
    <div id="calendar"></div>
    <div id="events-list" class="mt-6"></div>
</div>

<script>
    const events = [
        { date: '2025-08-10', title: 'Reunião com Cliente na semana que vem', hours: '18:30', description: 'Discussão do projeto X', link: '#' },
        { date: '2025-08-10', title: 'Justiça nomeia perita contábil em processo de insalubridade dos Agentes de Combate às Endemias do município de Salvador', hours: '18:30', description: 'Discussão do projeto X', link: '#' },
        { date: '2025-08-13', title: 'Revisão do Contrato', hours: '18:30', description: 'Revisão de termos com equipe jurídica', link: '#' },
        { date: '2025-08-15', title: 'Entrega do Relatório', hours: '18:30', description: 'Finalização do relatório mensal', link: '#' },
        { date: '2025-08-19', title: 'Reunião com Cliente na semana que vem 01', hours: '18:30', description: 'Discussão do projeto X', link: '#' },
        { date: '2025-08-20', title: 'Workshop', hours: '18:30', description: 'Treinamento interno', link: '#' }
    ];

    const holidays = [
        { date: '2025-08-07', name: 'Dia da Independência' },
        { date: '2025-09-21', name: 'Feriado Municipal' }
    ];

    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    const calendarEl = document.getElementById('calendar');
    const eventsListEl = document.getElementById('events-list');

    function renderCalendar(month, year) {
        calendarEl.innerHTML = '';

        // Nome do mês com inicial maiúscula
        const monthName = new Date(year, month).toLocaleString('default', { month: 'long' });
        const formattedMonth = monthName.charAt(0).toUpperCase() + monthName.slice(1);

        // Header com navegação
        const header = document.createElement('div');
        header.className = 'header';
        header.innerHTML = `
            <button onclick="prevMonth()">&#8592;</button>
            <span>${formattedMonth} ${year}</span>
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

            // Número do dia
            const dayNumber = document.createElement('div');
            dayNumber.textContent = day;
            dayNumber.classList.add('day-number');
            dayEl.appendChild(dayNumber);

            // Criar o container dos eventos
            if(dayEvents.length > 0){
                const eventList = document.createElement('div');
                eventList.classList.add('event-list');

                dayEvents.forEach(ev => {
                    const evDiv = document.createElement('div');
                    evDiv.textContent = ev.title;
                    evDiv.classList.add('event-badge');
                    eventList.appendChild(evDiv);
                });

                dayEl.appendChild(eventList);
                dayEl.classList.add('event');
            }

            // Feriados
            const holiday = holidays.find(h => h.date === fullDate);
            if (holiday) {
                dayEl.style.border = '2px solid #E5282A';
            }

            dayEl.addEventListener('click', () => {
                // Remove borda e fundo de todos os dias
                document.querySelectorAll('.day').forEach(d => {
                    const dayNumber = d.querySelector('.day-number').textContent;
                    const fullDateCheck = `${year}-${String(month+1).padStart(2,'0')}-${String(dayNumber).padStart(2,'0')}`;
                    const holiday = holidays.find(h => h.date === fullDateCheck);

                    if (holiday) {
                        d.style.border = '2px solid #E5282A'; // feriado padrão
                        d.style.backgroundColor = ''; // remove fundo anterior
                    } else {
                        d.style.border = '1px solid #ddd'; // padrão
                        d.style.backgroundColor = ''; // remove fundo anterior
                    }
                });

                // Aplica borda e fundo ao dia clicado
                const clickedHoliday = holidays.find(h => h.date === fullDate);
                if (clickedHoliday) {
                    dayEl.style.border = '2px solid #F5B8B8'; // vermelho mais claro
                    dayEl.style.backgroundColor = '#FDEDEE'; // fundo suave vermelho
                } else {
                    dayEl.style.border = '2px solid #2F368B'; // azul escuro
                    dayEl.style.backgroundColor = '#E6E8F8'; // fundo azul claro
                }

                // Renderiza eventos do dia
                renderEvents(fullDate);

                eventsListEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });

            calendarEl.appendChild(dayEl);

        }

        // Render feriados do mês vigente
        renderHolidays(month, year);

        // Lista eventos do mês
        renderEventsMonth(month, year);
    }

    function renderHolidays(month, year) {
        // remove bloco anterior de feriados
        const oldBlock = document.getElementById('holidays-block');
        if (oldBlock) oldBlock.remove();

        const monthHolidays = holidays.filter(h => {
            const date = new Date(h.date);
            return date.getMonth() === month && date.getFullYear() === year;
        });

        if (monthHolidays.length > 0) {
            const block = document.createElement('div');
            block.id = 'holidays-block';
            block.innerHTML = `<h3 class="holiday-month">Feriados</h3>`;

            monthHolidays.forEach(h => {
                const div = document.createElement('div');
                div.className = 'holiday-item';
                div.innerHTML = `${formatDateLocal(h.date)}: <strong>${h.name}</strong>`;
                block.appendChild(div);
            });

            // insere antes da lista de eventos
            eventsListEl.parentNode.insertBefore(block, eventsListEl);
        }

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
                <strong>${formatDateLocal(e.date)}</strong> - <span>${e.hours}</span> <br> <h4>${e.title}</h4>
                <div class="description">${e.description}</div> <br>
                <a href="${e.link}">Acessar</a>
            `;
            eventsListEl.appendChild(div);
        });

        if (monthEvents.length === 0) {
            eventsListEl.innerHTML = '<p>Nenhum evento neste mês.</p>';
        }
    }

    function formatDateLocal(dateStr) {
        const parts = dateStr.split('-'); // "2025-08-15" => ["2025","08","15"]
        const date = new Date(parts[0], parts[1]-1, parts[2]); // mês é 0-index
        return date.toLocaleDateString('pt-BR');
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
                <strong>${formatDateLocal(e.date)}</strong> - <span>${e.hours}</span> <br> <h4>${e.title}</h4>
                <div class="description">${e.description}</div> <br>
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
